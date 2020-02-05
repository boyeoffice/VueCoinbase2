import Vue from 'vue'
import Vuex from 'vuex'
import { config } from '_/config/config'
import * as actions from '_/vuex/actions'
import * as getters from '_/vuex/getters'
import profile from '_/vuex/modules/profile'
import update from '_/vuex/modules/update'

Vue.use(Vuex)

export const store = new Vuex.Store({
	actions,
	getters,
	modules: {
		profile,
		update
	},
	 strict: config.ENV.debug
})