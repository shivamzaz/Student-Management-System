import React from 'react';
import axios from 'axios';
import * as config from './../../../config/app';
import * as Form from './../../../utils/form';

var Login = React.createClass({
  getInitialState : function(){
    return {
      email: "",
      password: "",
      errors : {}
    }
  },

  componentWillMount: function(){},

  // update input state onChange
   _onChange: function(e) {
       var new_state = Form.inputOnChange(e, this.state);
       this.setState(new_state);
   },

  _onSubmit: function(e){
      e.preventDefault();
      axios.post(config.base_url + '/api/v1/login', {  //this.props.routeParams.studentId
        email : this.state.email,
        password : this.state.password,
      })
      .then(response => {
        console.log(response.data);
        localStorage.setItem('logintoken', JSON.stringify(response.data.user));
      })
      .catch(error => {
        if(error.response.status = 422){
        let errors = Form.getFormErrors(error.response.data);
        this.setState({
          errors : errors
        });
       }
      });
  },
  render: function(){
    return(
      <div>
        <h3>Welcome back!</h3>
      	<div className="content">
      		<form className="form-horizontal" method="post" action="#" role="form" onSubmit={this._onSubmit} >>
      			<div className={Form.formGroupClass(this.state.errors.email)}>
      				<strong>Email address</strong>
      				<input className="form-control" type="text" placeholder="email"  name="email" onChange={this._onChange} value={this.state.email}/>
      			</div>
      			<div className={Form.formGroupClass(this.state.errors.password)}>
      				<strong>Password</strong>
      				<input className="form-control" type="password" placeholder="password" name="password" onChange={this._onChange} value={this.state.password}/>
      			</div>

            <div className="form-group form-actions">
            <div className="col-sm-offset-2 col-sm-10">
             <div className="signup">
              <button type="submit" className="btn btn-success">Login </button>
             </div>
            </div>
      	 </div>
         </form>
      </div>
    </div>
    );
 	}
 });
 export default Login;
