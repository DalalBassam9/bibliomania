import Vue from 'vue';
import VueRouter from 'vue-router';
import Start from './views/Start';
import NewsFeed from "./views/NewsFeed";
import Login from './views/Login';
import UserShow from './views/Users/Show';
import Book from './views/Book';
import BooksList from './views/BooksList';
import Users from './views/Users';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/', name: 'home', component: NewsFeed,
            meta: { title: 'الصفحة الرئيسية' }
        },

        {
            path: '/sign-in', name: 'login', component:Login,
            meta: {guest: true,title: 'تسجيل الدخول'}

        },

        {
            path: '/users',
            component: Users,
            name: 'users',
              meta: { title: 'القراء' }

        },
        {
            path: '/books',
            component: BooksList,
            name: 'booksList',
              meta: { title: 'الكتب' }

        },

         {
            path: '/book/:bookId',  name: 'bookId',
             component: Book,
               meta: { title: 'الكتاب' }

        },

        {
            path: '/profile/:userId', name: 'user.show', component: UserShow,
            meta: { title: 'الملف الشخصي' }
        }
    ]
});
