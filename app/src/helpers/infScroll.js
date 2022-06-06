var infScroll = {
  verMais(_vm, dispatchFunction = _vm.defaultDispatchFunction) {
    console.log(_vm.page)
    _vm.$store.dispatch(dispatchFunction, {page: _vm.page, overwrite: false});
    _vm.page++;
    _vm[_vm.objectType] = _vm.$store.state[_vm.objectType];
  },  
  async handleScroll(_vm, dispatchFunction = _vm.defaultDispatchFunction){
    if(_vm.$refs.scrollComponent.getBoundingClientRect().bottom < window.innerHeight*1.01 && _vm.$store.state[_vm.defaultFinishedFlagInStore] === false){
      await infScroll.verMais(_vm, dispatchFunction)
    }
  }
}

export default infScroll
