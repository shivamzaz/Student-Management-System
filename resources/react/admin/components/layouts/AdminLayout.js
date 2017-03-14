import React from 'react';
import Sidebar from './../ui/Sidebar';
import Content from './../ui/Content';

var AdminLayout = React.createClass({

  render : function(){

    return (
      <div id="admin">
        <Sidebar {...this.props} />
        <Content {...this.props}/>
      </div>
    );
  }
});

export default AdminLayout;
