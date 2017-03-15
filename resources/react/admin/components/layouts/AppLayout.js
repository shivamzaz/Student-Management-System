import React from 'react';
import Sidebar from './../ui/Sidebar';
import Content from './../ui/Content';

class Content extends React.Component{

  render : function(){

    return this.props.children;
  }
});

export default AppLayout;
