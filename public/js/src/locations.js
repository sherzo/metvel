const uri = 'http://127.0.0.1:8000'


new Vue({
  el: '#app',
  data: {
    states: [],
    cities: [],
    parish: {
      id: 0,
      name: 'Seleccione',
      municipality_id: 0
    },
    municipalities: [],
    city_id: 0,
    state_id: 0,
    parish_id: 0,
    municipality_id: 0
  },
  mounted () {
    axios.get(`${uri}/api/states`)
      .then(res => {
        this.states = res.data
      })
  },
  methods: {
    getCitiesAndMunicipalities () {
      let state_id = this.state_id

      axios.get(`${uri}/api/get/${state_id}/cities-and-municipalities`)
        .then(res => {
          this.cities = res.data.cities
          this.municipalities = res.data.municipalities
        })
    },
    getParishes () {
      let municipality_id = this.municipality_id 

      axios.get(`${uri}/api/parishes/${municipality_id}`)
        .then(res => {
          this.parish = res.data
        })
    }
  }
})