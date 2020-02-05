const state = {
	updateDetail: []
}

const mutations = {
	RECIEVE_UPDATE(sate, payload) {
		state.updateDetail = payload
	}
}

export default {
	mutations,
	state
}