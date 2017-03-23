import React from 'react';
import axios from 'axios';
import * as config from './../../../config/app';
import * as Form from './../../../utils/form';
import { Link } from 'react-router';
import { browserHistory } from 'react-router';


var ForgotPasswordView = React.createClass({
	getInitialState: function(){
      return {
        email : "",
        hash : "",
        errors : {},
        flash_message : "",
        sent : false
      }
    },

    componentWillMount : function(){
      let _this = this;
      let hash = this.props.routeParams.hash;
      // it'll run from mail user side.
      _this.setState({
        hash : hash
      });
	  
	  if(hash != undefined)
	  {
	  	axios.post(config.base_url+ '/api/v1/forgot-password/verify', {
    	  	hash : hash
      })
		.then(response => {
			console.log(response.data);
			_this.setState({ hash : "", flash_message : ""});
            if(!localStorage.getItem('smsAppApiToken')){
            	localStorage.setItem('smsAppApiToken', response.data.data.apiToken);
              // localStorage.getItem('smsAppApiToken')
            	browserHistory.push('/app/reset-password');
            }

	  })
	  	.catch(response => {
        console.log(response);
      });
	  }
 
    }, 
    // come from app side
    _onSubmit : function(e){
      e.preventDefault();

      let _this = this;
      _this.setState({
        sent : false,
        errors : {}
      });
      axios.post(config.base_url + '/api/v1/forgot-password',{
		      	email : _this.state.email
		      })
      .then(response=> {
		      	console.log(response.data);
		      	_this.setState({
			        sent : true,
		      });

      })
      .catch(response => {
		        console.log(response);
		      });

},
    // update input state onChange
    _onChange: function (e) {
        // let new_state = Form.inputOnChange(e, this.state);
        // this.setState(new_state);
        this.setState({
      		email: e.target.value
    	})
    },

	   render : function(){
        return (
            <div id="signin">
                  <div className="container">
                      <div className="col-md-4 col-md-offset-4">
                            <div className="panel-heading"><h2 className="panel-title"><strong>Forgot your Password ? </strong></h2></div>
                            <div className="panel-body">

                                  { this.state.sent ? (
                                    <div className="alert alert-success">Email sent to your mail !</div>
                                  ) : false }

                                  { this.state.flash_message != "" ? (
                                    <div className="alert alert-danger">{this.state.flash_message}</div>
                                  ) : false }

                                  <div className={Form.formGroupClass(this.state.errors.email)}>
                                    <label className="control-label">Email</label>
                                    <input placeholder="Email Address" className="form-control" name="email" value={this.state.email} onChange={this._onChange}/>
                                    <span className="help-block">{this.state.errors.email}</span>
                                  </div>

                                  <button className="btn btn-success" style={{ marginRight : '10px'}} onClick={this._onSubmit}>Send me link</button>
                                  <Link to={'/app/login'} style={{ marginRight : '10px'}}>
                                    Login
                                  </Link>

                            </div>

                        </div>
                    </div>
            </div>
        );
    }
});

 export default ForgotPasswordView;