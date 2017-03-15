import React from 'react';
import Sidebar from './../ui/Sidebar';
import Content from './../ui/Content';

class AdminLayout extends React.Component{

  render(){

    return (
      <div id="admin">
        <Sidebar {...this.props} />
        <Content {...this.props}/>
      </div>
    );
  }
};

export default AdminLayout;
