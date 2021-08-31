import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Books from '../components/Books';
import AddBook from '../components/AddBook';
import EditBook from '../components/EditBook';

import Blogs from '../components/Blogs';
import AddBlog from '../components/AddBlog';
import EditBlog from '../components/EditBlog';

import Nisabs from '../components/Nisabs';
import AddNisab from '../components/AddNisab';
import EditNisab from '../components/EditNisab';





import ZakatItems from '../components/ZakatItems';
import AddZakatItem from '../components/AddZakatItem';
import EditZakatItem from '../components/EditZakatItem';
import Faqs from '../components/Faqs';
import AddFaq from '../components/AddFaq';
import EditFaq from '../components/EditFaq';
import Donations from '../components/Donations';
import ZakatRequests from '../components/ZakatRequests';



export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'donations',
        path: '/donations',
        component: Donations
    },
    {
        name: 'zakat-requests',
        path: '/zakat-requests',
        component: ZakatRequests
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'zakatitems',
        path: '/zakatitems',
        component: ZakatItems
    },
    {
        name: 'addzakatitem',
        path: '/zakatitems/add',
        component: AddZakatItem
    },
    {
        name: 'editzakatitem',
        path: '/zakatitems/edit/:id',
        component: EditZakatItem
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'books',
        path: '/books',
        component: Books
    },


    {
        name: 'addbook',
        path: '/books/add',
        component: AddBook
    },
    {
        name: 'editbook',
        path: '/books/edit/:id',
        component: EditBook
    },
    {
        name: 'blogs',
        path: '/blogs',
        component: Blogs
    },


    {
        name: 'addblog',
        path: '/blogs/add',
        component: AddBlog
    },
    {
        name: 'editblog',
        path: '/blogs/edit/:id',
        component: EditBlog
    },
    {
        name: 'nisabs',
        path: '/nisabs',
        component: Nisabs
    },


    {
        name: 'addnisab',
        path: '/nisabs/add',
        component: AddNisab
    },
    
    {
        name: 'editnisab',
        path: '/nisabs/edit/:id',
        component: EditNisab
    },
    {
        name: 'faqs',
        path: '/faqs',
        component: Faqs
    },


    {
        name: 'addfaq',
        path: '/faqs/add',
        component: AddFaq
    },
    {
        name: 'editfaq',
        path: '/faqs/edit/:id',
        component: EditFaq
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
