export const storeProfile = ({ commit }, user) => {
	commit('RECIEVE_USER', user)
}

export const storeUpdate = ({ commit }, update) => {
	commit('RECIEVE_UPDATE', update)
}