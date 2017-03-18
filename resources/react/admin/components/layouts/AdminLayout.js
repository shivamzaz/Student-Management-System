import React from 'react';
import Sidebar from './../ui/Sidebar';
import Content from './../ui/Content';
import { browserHistory } from 'react-router';
import * as localstorage from './../../../utils/localstorage';


var AdminLayout = React.createClass({

	 getInitialState : function (){
			return {
				loading : true
			}
	},

	componentWillMount : function() {
		if(!localstorage.get('auth_user')){
			browserHistory.push('/app/login');
		}
		else{
			this.setState({
				//dont render child class till loading is true
				loading : false
			});
		}
	},

 render : function(){
  	let content = this.state.loading ? (
			<img src="https://s-media-cache-ak0.pinimg.com/originals/0c/44/da/0c44dacf1b038014a6f941131c5e8aa2.gif" />
		) : (
			<div id="admin">
        <Sidebar {...this.props} />
        <Content {...this.props}/>
      </div>
		);

		return content;
  }
});

export default AdminLayout;
