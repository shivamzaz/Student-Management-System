import React from 'react';
import axios from 'axios';
import * as config from './../../../config/app';
import * as Form from './../../../utils/form';
import { Link } from 'react-router';
import { browserHistory } from 'react-router';

var ResetPasswordView = React.createClass({

    getInitialState: function(){
        return {
          email : "",
          password : "",
          errors : {}
        }
    },
    _onSubmit : function(e){
    	let _this = this;
    	e.preventDefault();
    	axios.post(config.base_url + '/api/v1/reset-password', {  //this.props.routeParams.studentId
	        email : _this.state.email,
	        password : _this.state.password,
	      }, {
	      	'headers' : {'Authorization' : localStorage.getItem('smsAppApiToken')}
	      })
    	.then(response=>{
    		console.log(response);
    		localStorage.setItem('smsAppApiToken', response.data.data.user.api_token);
    		browserHistory.push('/app/admin/students');
    	})
    	.catch(function(error){
    		console.log(error);
    	})

    },
    _onChange: function (e) {
        let new_state = Form.inputOnChange(e, this.state);
        this.setState(new_state);
    },

    render : function(){
        return (
            <div id="sign-in">
                <div className="container">
                    <div className="col-md-4 col-md-offset-4">
                          <div className="panel-heading"><h2 className="panel-title"><strong>Reset your password </strong></h2></div>
                          <div className="panel-body">

                                <div className={Form.formGroupClass(this.state.errors.email)}>
                                  <label className="control-label">Email</label>
                                  <input placeholder="Email Address" className="form-control" name="email" value={this.state.email} onChange={this._onChange}/>
                                  <span className="help-block">{this.state.errors.email}</span>
                                </div>

                                <div className={Form.formGroupClass(this.state.errors.password)}>
                                  <label className="control-label">Password</label>
                                  <input placeholder="Password" type="password" className="form-control" name="password" value={this.state.password} onChange={this._onChange}/>
                                  <span className="help-block">{this.state.errors.password}</span>
                                </div>
                                <button className="btn btn-success" style={{ marginRight : '10px'}} onClick={this._onSubmit}>Submit</button>
                                <Link to={'app/login'}>
                                  Login
                                </Link>

                          </div>

                      </div>
                  </div>
            </div>
        );
    }
});

 export default ResetPasswordView;
