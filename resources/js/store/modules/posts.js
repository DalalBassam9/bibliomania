const state = {
    posts: null,
    books: null,
        book: null,
    bookStatus: null,
    postsStatus: null,
    postMessage: '',
    arrStar: [],
    ratings: null,
  //    rating:null,
};

const getters = {
    posts: state => {
        return state.posts;
    },
    ratings: state => {
        return state.ratings
    },




    book: state => {
        return state.book;
    },

    books: state => {
        return state.books;
    },
    arrStar: state => {
        return state.arrStar;
    },


    newsStatus: state => {
        return {
            postsStatus: state.postsStatus,

            booksStatus: state.booksStatus,
              book: state.bookStatus,

        }
    },
    postMessage: state => {
        return state.postMessage;
    }
};

const actions = {
    fetchNewsPosts({commit, state}) {
        commit('setPostsStatus', 'loading');

        axios.get('/api/posts')
            .then(res => {
                commit('setPosts', res.data);
                commit('setPostsStatus', 'success');
            })
            .catch(error => {
                commit('setPostsStatus', 'error');
            });
    },

   fetchBook({commit, state}, bookId) {

    commit('setBookStatus', 'loading');
        axios.get('/api/book' + bookId)
            .then(res => {
                commit('setBook', res.data.book);
               commit('setBookStatus', 'success');

            })
            .catch(error => {
                console.log(error.res);
            });
    },

     fetchStarRating({commit, state}, bookId) {

        axios.get('/api/get-strar-ratings/' + bookId)
            .then(res => {
          commit('setArrStar', res.data.arrStar);

            })
            .catch(error => {

            });
    },



     fetchRating({commit, state}, bookId) {

        axios.get('/api/get-rating/' + bookId)
            .then(res => {
          commit('setRatings', res.data);

            })
            .catch(error => {
   console.log(error.res);
            });
    },



    fetchBooks({ commit, state }) {
  commit('setBooksStatus', 'loading');
        axios.get('/api/books')
            .then(res => {
                commit('setBooks', res.data);
                commit('setBooksStatus', 'success');
            })
            .catch(error => {
                commit('setBooksStatus', 'error');
            });
    },

    fetchUserPosts({commit, dispatch}, userId) {
        commit('setPostsStatus', 'loading');

        axios.get('/api/users/' + userId + '/posts')
            .then(res => {
                commit('setPosts', res.data);
                commit('setPostsStatus', 'success');
            })
            .catch(error => {
                commit('setPostsStatus', 'error');
            });
    },
    postMessage({commit, state}) {
        commit('setPostsStatus', 'loading');

        axios.post('/api/posts', { body: state.postMessage })
            .then(res => {
                commit('pushPost', res.data);
                commit('setPostsStatus', 'success');
                commit('updateMessage', '');
            })
            .catch(error => {
            });
    },
    deleteQuote({ commit, state }, data) {
        axios.post('/api/quote/delete/' + data.postId).then(res => {
            commit('deletePost', data.postId);
        })
            .catch(error => {
console.log('error.res')

            });


    },


 addFavoriteQuote({commit, state},data) {
        axios.post('/api/favorites/' + data.postId)
            .then(res => {


                commit('pushFavorite',{favorites: res.data, postKey: data.postKey });
            })
            .catch(error => {
            });
    },
  setRating({commit, state},data) {
        axios.post('/api/add-rating/' + data.bookId, { 'review': data.review })
            .then(res=> {
                commit('pushRating', res.data);

            })
            .catch(error => {
                console.log(error.res);
            });
    },


 deleteFavoriteQuote({commit, state},data) {
        axios.post('/api/favorites-delete/' + data.postId)
            .then(res => {
  commit('deleteFavorite', data.postId);

            })
            .catch(error => {
            });
    },



    addFavoriteBook({commit, state},data) {
        axios.post('/api/favorites-book/' + data.bookId)
            .then(res => {
                commit('pushFavoriteBook', { favorites: res.data,bookKey:data.bookKey });

            })
            .catch(error => {
                console.log(error.res)
            });
    },


    likePost({commit, state}, data) {
        axios.post('/api/posts/' + data.postId + '/like')
            .then(res => {
                commit('pushLikes', { likes: res.data, postKey: data.postKey });
            })
            .catch(error => {
            });
    },
    commentPost({commit, state}, data) {
        axios.post('/api/posts/' + data.postId + '/comment', { body: data.body })
            .then(res => {
                commit('pushComments', { comments: res.data, postKey: data.postKey });
            })
            .catch(error => {
            });
    }
};

const mutations = {
    setPosts(state, posts) {
        state.posts = posts;
    },
    setBooks(state, books) {
        state.books = books;
    },
   setBook(state, book) {
        state.book= book;
    },

    setRatings(state, ratings) {
        state.ratings = ratings;
   },

    setBookStatus(state, status) {
        state.bookStatus = status;
    },


 setArrStar(state,arrStar) {
        state.arrStar = arrStar;
    },

    setPostsStatus(state, status) {
        state.postsStatus = status;
    },
    updateMessage(state, message) {
        state.postMessage = message;
    },
    pushPost(state, post) {

        state.posts.data.unshift(post);
    },
    pushLikes(state, data) {
        state.posts.data[data.postKey].data.attributes.likes = data.likes;
    },

    pushFavorite(state, data) {
       state.posts.data[data.postKey].data.attributes.favorites = data.favorites;
  },
    pushFavoriteBook(state, data) {

       state.books.data[data.bookKey].data.attributes.favorites = data.favorites;
     //   state.books.data.attributes.favorites.unshift(data);
    },

    pushComments(state, data) {
        state.posts.data[data.postKey].data.attributes.comments = data.comments;
    },
deletePost(state,post) {
       state.posts.data.splice(state.posts.data.indexOf(post), 1);
    },

deleteFavorite(state,post) {
       state.posts.data.splice(state.posts.data.indexOf(post), 1);
    },

    pushRating(state, rating) {
        state.ratings.data.push(rating);
        state.books.data.attributes.reviews.push(rating);
    },


};

export default {
    state, getters, actions, mutations,
}
