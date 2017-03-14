import React from 'react';
import { Router, Route, IndexRoute, browserHistory } from 'react-router';

import AdminLayout from './admin/components/layouts/AdminLayout.js';

// students
import StudentList from './admin/components/students/StudentList.js';

export default (
<Router history={browserHistory}>
    <Route path="app">

        <Route path="admin" component={AdminLayout}>
            {/*students*/}
            <Route path="students">
              <IndexRoute component={StudentList} />
            </Route>
        </Route>
    </Route>
</Router>
);
