var dispatch = new Vue({
  el: '#app',
  data: {
    clientAdrress: false,
    states: [],
    cities: [],
    state_id: '',
    city_id: '',
    state: '',
    client: {},
    products: [],
    selected: [],
    product_id: '',
    city: ''
  },
  computed: {
    total () {
      let total = 0
      this.selected.forEach(e => {
        total += e.quantity * e.price
      })
      return total
    }
  },
  mounted () {
    this.getStates()
    this.getProducts()    
  },
  methods: {
    getStates () {
      axios.get(`api/states`)
        .then(res => {
          this.states = res.data
         })
          .catch(err => {
            this.showError(err)
          })
    },
    getProducts () {
      axios.get('api/products/get') 
        .then(res => {
          this.products = res.data
        })
          .catch(err => {
            this.showError(err)
          })
    },
    showError (err) {
      console.log(err)
      demo.showNotification('Eror', 
        'Algo ha ocurrido, intente de nuevo',
        'danger'
      )
    },
    getClientData (client_id) {
      axios.get(`api/${client_id}/client`)
        .then(res => {
          this.client = res.data
        })
          .catch(err => {
            this.showError(err)
          })

    },
    getCitiesAndMunicipalities () {
      this.city_id = '';
      let state_id = this.state_id

      axios.get(`api/get/${state_id}/cities-and-municipalities`)
        .then(res => {
          this.cities = res.data.cities
        })
    },
    addProduct () {
      i = this.product_id

      this.selected.push({
        id: this.products[i].id,
        price: parseFloat(this.products[i].price),
        name: this.products[i].name,
        quantity: 1
      })
    },
    removeProduct (i) {
      this.selected.splice(i, 1)
    }
  }
})