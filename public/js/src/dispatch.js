new Vue({
  el: '#app',
  data: {
    customerAdrress: false
  },
  mounted () {
    alert('asdasd')
  },
  methods: {
    getDataOfClient () {
      axios.get(`api/${client_id}/client`)
        .then(res => {
          this.
        })
          .catch(err => {
            console.log(err)
            demo.showNotification('Error', 'Algo ha ocurrido intente de nuevo', 'danger')
          })

    }
  }
})