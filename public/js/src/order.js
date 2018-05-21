var order = new Vue({
  el: '#app',
  data: {
    provider: {},
    products: [],
    selected: [],
    product_id: ''
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
  methods: {
    showError (err) {
      console.log(err)
      demo.showNotification('Eror', 
        'Algo ha ocurrido, intente de nuevo',
        'danger'
      )
    },
    getProviderData (provider_id) {
      axios.get(`api/${provider_id}/provider`)
        .then(res => {
          this.povider = res.data.provider
          this.products = res.data.products
        })
          .catch(err => {
            this.showError(err)
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