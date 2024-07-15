
export default defineNuxtConfig({
  runtimeConfig: {
    public: {
      baseURL: process.env.BACKEND_URL || "http://decameron.local:8000",
      FRONTEND_URL: process.env.FRONTEND_URL,
    },
  },
  devtools: { enabled: true },
  app: {
    head: {
      link: [
        { rel: "icon", type: "image/png", href: "/favicon.png" },
        {rel:'stylesheet' , href:'https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i'},
        {rel:'stylesheet' , href:'https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&display=swap'},
        {rel:'stylesheet' , href:'https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i'}
      ]
    },
  },
  css:['@/assets/scss/app.scss'],
  script:[
    {
      src:'/bootstrap.bundle.min.js'
    }
],
alias: {
  pinia: "/node_modules/@pinia/nuxt/node_modules/pinia/dist/pinia.mjs"
},

build: {
  transpile: ['@vuepic/vue-datepicker']
},
modules: ['nuxt-icon' , '@pinia/nuxt'],
pinia: {
  autoImports: [
    'defineStore', 
    ['defineStore', 'definePiniaStore'], 
  ],
},
plugins:[
  {
    src:'@/plugins/usebootstrap.client.ts',
    mode:'client'
  },
  {
    src:'@/plugins/plugins.ts',
    mode:'client'
  },
  {
    src:'@/plugins/ssrplugins.ts'
  }
]
})
