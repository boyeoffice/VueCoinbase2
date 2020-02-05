const state = {
	userDetails: {}
}

const mutations = {
	RECIEVE_USER(state, payload){
		state.userDetails = payload
	}
}

export default {
	state,
	mutations
}