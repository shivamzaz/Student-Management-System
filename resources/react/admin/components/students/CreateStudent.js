import React from 'react';
import axios from 'axios';
import * as config from './../../../config/app';
import * as Form from './../../../utils/form';
import { browserHistory } from 'react-router';

var CreateStudent = React.createClass({

  getInitialState : function(){
    return {
      full_name: "" ,
      address: "",
      year: "",
      gender: "",
      interests: [],
      selected_interests : [],
      errors : {}
    }
  },

  componentWillMount: function(){
    axios.get(config.base_url + '/api/v1/interests')
      .then(response => {
          this.setState({
              interests : response.data
            });
        })
          .catch(function (error) {
            console.log(error);
      });
  },

  // update input state onChange
   _onChange: function(e) {
       var new_state = Form.inputOnChange(e, this.state);
       this.setState(new_state);
   },

  _onSubmit: function(e){
      e.preventDefault();

      axios.post(config.base_url + '/api/v1/students', {  //this.props.routeParams.studentId
        full_name : this.state.full_name,
        address : this.state.address,
        year : this.state.year,
        gender : this.state.gender,
        interests : this.state.selected_interests
      })
      .then(response => {
        console.log(response.data);
        browserHistory.push('/app/admin/students');
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
_redirecthome: function(){
  browserHistory.push('/app/admin/students');
},

  render: function(){
    return (
      <div id="content">
  			<div className="menubar">
  				<div className="sidebar-toggler visible-xs">
  					<i className="ion-navicon"></i>
  				</div>

  				<div className="page-title">
  					Add a new student
  					<small className="hidden-xs">
  						<strong>Enter Details: </strong>
  					</small>
  				</div>
  			</div>

  			<div className="content-wrapper">
  				<form id="new-customer" className="form-horizontal" method="post" action="#" role="form" onSubmit={this._onSubmit}>
  				  	<div className={Form.formGroupClass(this.state.errors.full_name)}>
  					    <label className="col-sm-2 col-md-2 control-label">First name</label>
  					    <div className="col-sm-10 col-md-8">
  					      <input type="text" className="form-control" name="full_name" onChange={this._onChange} value={this.state.full_name} />
                  <span className="help-block">{this.state.errors.full_name}</span>
  					    </div>
  				  	</div>
              <div className={Form.formGroupClass(this.state.errors.address)}>
  					    <label htmlFor="inputPassword3" className="col-sm-2 col-md-2 control-label">Address</label>
  					    <div className="col-sm-10 col-md-8">
  					    	<textarea className="form-control" rows="4" name="address" onChange={this._onChange} value={this.state.address}></textarea>
                  <span className="help-block">{this.state.errors.address}</span>
  					    </div>
  				  	</div>
  				  	<div className={Form.formGroupClass(this.state.errors.year)}>
  					    <label className="col-sm-2 col-md-2 control-label">Year</label>
  					    <div className="col-sm-10 col-md-8">
  					    	<div className="has-feedback">
  								<input type="number" className="form-control mask-phone" name="year" onChange={this._onChange} value={this.state.year}/>
  						      	<i className="ion-information-circled form-control-feedback" data-toggle="tooltip" title="Tooltip helper example">
  						      	</i>
                      <span className="help-block">{this.state.errors.year}</span>
  							</div>
  					    </div>
  				  	</div>
              <div className={Form.formGroupClass(this.state.errors.gender)}>
                <label className="col-sm-2 col-md-2 control-label">Gender</label>
                <div className="col-sm-10 col-md-8">
                  <div className="radio" >
                    <label>
                      <input type="radio" name="gender" value="1" onChange={this._onChange} />
                      <span>Male</span>
                    </label>
                  </div>
                  <div className="radio" >
                    <label>
                      <input type="radio" name="gender" value="2" onChange={this._onChange} />
                      <span>Female</span>
                    </label>
                  </div>
                  <span className="help-block">{this.state.errors.gender}</span>
                </div>
              </div>
            <div className={Form.formGroupClass(this.state.errors.interests)}>
                <label className="col-sm-2 col-md-2 control-label">Interests</label>
                <div className="col-sm-10 col-md-8">
                  {/* <input type="checkbox" name="Programming" value=" Programming"/>Programming<br/>
                    <input type="checkbox" name="Music" value=" Music"/>Music<br/>
                    <input type="checkbox" name="Music" value=" Dance"/>Dance<br/> */}
                    { this.state.interests.map((interest,index) =>
                      <div className="checkbox interests-input" key={index}>
                        <label>
                           <input type="checkbox" name="selected_interests" value={interest.id} onChange={this._onChange} checked={this.state.selected_interests.indexOf(interest.id) > -1 ? true : false} />
                          <span>{interest.title}</span>
                        </label>
                      </div>
                    )}
                </div>
                <span className="help-block">{this.state.errors.interests}</span>
              </div>

  				  	<div className="form-group form-actions">
  				    	<div className="col-sm-offset-2 col-sm-10">
  				    		
  				      		<button type="submit" className="btn btn-success">Save Student </button>
  			    		</div>
  				  	</div>
  				</form>
  			</div>
  		</div>
    )
}

  });

  export default CreateStudent;
