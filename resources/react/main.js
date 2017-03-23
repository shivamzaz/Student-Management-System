import React from 'react';
import ReactDOM from 'react-dom';
import Router from './routes';

Messenger.options = {
	extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
	theme: 'flat'
}

ReactDOM.render(Router, document.getElementById('app'));
