import React from 'react';
import { Router, Route, IndexRoute, browserHistory } from 'react-router';

import AdminLayout from './admin/components/layouts/AdminLayout.js';

// students
import StudentList from './admin/components/students/StudentList.js';
import StudentEditForm from './admin/components/students/StudentEditForm.js';
import CreateStudent from './admin/components/students/CreateStudent.js';

import Register from './admin/components/auth/Register.js';
import Login from './admin/components/auth/Login.js';
import ForgotPasswordView from './admin/components/auth/ForgotPasswordView.js'
// import VerifyAccountView from './admin/components/auth/VerifyAccountView.js'
 import ResetPasswordView from './admin/components/auth/ResetPasswordView.js'
 import NotFound from './utils/NotFound.js'

export default (
  <Router history={browserHistory}>
      <Route path="app">
          <Route path="admin" component={AdminLayout}>
              {/*students*/}
              <Route path="students">
                <IndexRoute component={StudentList} />
                <Route path="create" component={CreateStudent} />
                <Route path=":studentId" component={StudentEditForm} />

              </Route>
              {/*authentication*/}
          </Route>
          <Route path="register" component={Register}/>
          <Route path="login" component={Login}/>
          <Route path="forgot-password" component={ForgotPasswordView}/>
          <Route path='forgot-password/:hash' component={ForgotPasswordView} />
          <Route path="reset-password" component={ResetPasswordView}/>
          <Route path="*" component={NotFound} />

      </Route>
  </Router>
);
