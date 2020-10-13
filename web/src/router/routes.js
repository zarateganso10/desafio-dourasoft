
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue') },
      { path: '/clients', name: 'Clients', component: () => import('pages/ClientsPages/index.vue') },
      { path: '/clients/edit/:id', name: 'editClient', component: () => import('pages/ClientsPages/edit.vue') },
      { path: '/products', name: 'Products', component: () => import('pages/ProductsPages/index.vue') },
      { path: '/products/edit/:id', name: 'editProduct', component: () => import('pages/ProductsPages/edit.vue') },
      { path: '/orders', name: 'Orders', component: () => import('pages/OrdersPages/index.vue') },
    ]
  },
  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
