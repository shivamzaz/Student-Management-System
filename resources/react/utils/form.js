export function formGroupClass(field) {
  var className = "form-group ";
  if(field) {
    className += " has-error"
  }
  return className;
}

export function getFormErrors(response){
  let errors = {};
  if(response){
    for(var index in response.errors.validations){
      errors[index] = response.errors.validations[index][0];
    }
    if(Object.keys(errors).length != 0) {
      return errors;
    }
  }
}

export function inputOnChange(e, state){
  let new_state = {};
  let el = e.target;
  let type = el.type;
  let name = el.name;

  switch(type){

    case 'checkbox':
      let checkboxes = state[name];

      // adding or removing the categories from state categories
      if(el.checked){
        if(Array.isArray(checkboxes)){
            checkboxes.push(parseInt(el.value));
        }else{
          checkboxes = parseInt(el.value);
        }
      }else{
        if(Array.isArray(checkboxes)){
          var index = checkboxes.indexOf(parseInt(el.value));
          if (index >= 0) checkboxes.splice( index, 1 );
        }else{
          checkboxes = 0;
        }
      }

      new_state[name] = checkboxes;

      break;

    default:
      new_state[e.target.name] =  e.target.value;
      break;
  }

  return new_state;
}
