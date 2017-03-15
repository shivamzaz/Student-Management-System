import React from 'react';
import { Router, Route, IndexRoute, browserHistory } from 'react-router';

import AdminLayout from './admin/components/layouts/AdminLayout.js';

// students
import StudentList from './admin/components/students/StudentList.js';
import StudentEditForm from './admin/components/students/StudentEditForm.js';
import CreateStudent from './admin/components/students/CreateStudent.js';

export default (
  <Router history={browserHistory}>
      <Route path="app">

          <Route path="admin" component={AdminLayout}>
              {/*students*/}
              <Route path="students">
                <IndexRoute component={StudentList} />
                <Route path="create" component={CreateStudent} />
                <Route path=":studentId" component={StudentEditForm}>
                </Route>
              </Route>
          </Route>``
      </Route>
  </Router>
);