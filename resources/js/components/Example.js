import React from 'react';
import '../../css/app.css';
import ReactDOM from 'react-dom';
import Navbar from './Navbar';
import NewTask from './NewTask';
import SubmittedTask from './SubmittedTask';
import LeaderBoard from './LeaderBoard';
import Profile from './Profile';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
  } from "react-router-dom";

function Example(props) {
    return (
        <Router>
            <Navbar/>
            <Switch>
                <Route exact path="/user_panel">
                    <NewTask user={props.data}/>
                </Route>
                <Route exact path="/user_panel/submitted_task">
                    <SubmittedTask user={props.data}/>
                </Route>
                <Route exact path="/user_panel/leaderboard">
                    <LeaderBoard/>
                </Route>
                <Route exact path="/user_panel/profile">
                    <Profile user={props.data}/>
                </Route>

            </Switch>
        </Router>
    );
}

export default Example;

if (document.getElementById('example')) {
    var example = document.getElementById('example').getAttribute("data-user");
    ReactDOM.render(<Example data={example}/>, document.getElementById('example'));
}
