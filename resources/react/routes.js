import React from 'react';
import { Router, Route, IndexRoute, browserHistory} from 'react-router';

import AdminLayout from './admin/layouts/AdminLayout';
import StudentList from './admin/students/StudentList';

export default (
  <Router history={browserHistory}>

    <Route path="app">

      <Route component={AdminLayout}>

        <Route path="admin">

          <Route path="students">
              <IndexRoute component={StudentList} />
          </Route>

        </Route>

      </Route>

    </Route>

  </Router>
);
