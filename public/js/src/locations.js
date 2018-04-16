new Vue({
	el: '#app',
	data: {
		cities: [],
		municipalities: [],
		parishes: [],
		city_id: 0,
		state_id: 0,
		parish_id: 0,
		municipality_id: 0
	},
	methods: {
		getCitiesAndMunicipalities () {
			fetch(`api/${state_id}/cities-and-municipalties`)
				.then(res => {
					this.cities = res.cities
					this.municipalities = res.municipalities
				})
		},

		getParshes () {
			fetch(`api/${municipality_id}/parishes`)
				.then(res => {
					this.parshes = res
				})
		}
	}
})