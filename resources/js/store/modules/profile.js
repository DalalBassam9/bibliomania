const state = {
    user: null,
    userStatus: null,
    friends: null,
    modalVisible: false,

};

const getters = {
    user: state => {
        return state.user;
    },

        modalVisible: state => {
        return state.modalVisible;
    },

      friends: state => {
        return state.friends;
    },
    status: state => {
        return {
            user: state.userStatus,
            posts: state.postsStatus,
        };
    },
    friendship: state => {
        return state.user.data.attributes.friendship;
    },
    friendButtonText: (state, getters, rootState) => {
        if (rootState.User.user.data.user_id === state.user.data.user_id) {
            return '';
        } else if (getters.friendship === null) {
            return 'اضافة صديق';
        } else if (getters.friendship.data.attributes.confirmed_at === null
            && getters.friendship.data.attributes.friend_id !== rootState.User.user.data.user_id) {
            return 'طلب الصداقة معلق';
        } else if (getters.friendship.data.attributes.confirmed_at !== null) {
            return 'حذف صديق';
        }

        return 'Accept';
    }
};

const actions = {
    fetchUser({commit, dispatch}, userId) {
        commit('setUserStatus', 'loading');

        axios.get('/api/users/' + userId)
            .then(res => {
                commit('setUser', res.data);
                commit('setUserStatus', 'success');
            })
            .catch(error => {
                commit('setUserStatus', 'error');
            });
    },

    fetchFriends({commit, dispatch}, userId) {

    axios.get('/api/get-frindes/'+ userId).
        then(res => {
         commit('setFriends', res.data.users);

        })
            .catch(error=>{
                console.log(error.res);
            });
    },
    sendFriendRequest({commit, getters}, friendId) {
        if (getters.friendButtonText !== 'اضافة صديق') {
            return;
        }

        axios.post('/api/friend-request', { 'friend_id': friendId })
            .then(res => {
                commit('setUserFriendship', res.data);
            })
            .catch(error => {
            });
    },
    acceptFriendRequest({commit, state}, userId) {
        axios.post('/api/friend-request-response', { 'user_id': userId, 'status': 1 })
            .then(res => {
                commit('setUserFriendship', res.data);


            })
            .catch(error => {
            });
    },
    ignoreFriendRequest({commit, state}, userId) {
        axios.delete('/api/friend-request-response/delete', { data: { 'user_id': userId }})
            .then(res => {
                commit('setUserFriendship', null);
            })
            .catch(error => {
            });
    },
};

const mutations = {
    setUser(state, user) {
        state.user = user;
    },

  showModal(state) {
    state.modalVisible = !state.modalVisible

  },

    setUserFriendship(state, friendship) {

       state.user.data.attributes.friendship = friendship;
    },

    PushFriend(state,data) {
        state.user.data =state.friends  ;

    },

    setFriends(state, friends) {

        state.friends = friends;



},


    setUserStatus(state, status) {
        state.userStatus = status;
    },
};

export default {
    state, getters, actions, mutations,
}
