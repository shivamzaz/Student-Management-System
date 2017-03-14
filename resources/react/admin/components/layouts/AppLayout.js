import React from 'react';
import Sidebar from './../ui/Sidebar';
import Content from './../ui/Content';

var AppLayout = React.createClass({

  render : function(){
    
    return this.props.children;
  }
});

export default AppLayout;
