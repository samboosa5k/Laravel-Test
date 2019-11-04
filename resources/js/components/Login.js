import React from 'react';
import ReactDOM from 'react-dom';

class Login extends React.Component {
    constructor( props ) {
        super( props );
        this.state = {
            apiResponse: '',
            token: '',
            error: ''
        }

        this.handleLogin = this.handleLogin.bind( this );
    }

    handleLogin() {
        fetch( 'http://127.0.0.1:8000/api/auth/login', {
            method: 'POST',
            withCredentials: true,
            credentials: 'include',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'

            },
            body: JSON.stringify( {
                'email': 'admin@admin.com',
                'password': 'password'
            } )
        } )
            .then( response => response.json() )
            .then( data => {
                this.setState( { token: data } );
            } )

        fetch( 'http://127.0.0.1:8000/api/auth/user', {
            method: 'GET',
            withCredentials: true,
            credentials: 'include',
            headers: {
                'Authorization': 'bearer' + this.state.token,
                'X-FP-API-KEY': 'laravel-test',
                'Content-Type': 'application/json'
            }
        } )
            .then( response => response.json() )
            .then( data => {
                this.setState( { apiResponse: data } );
            } ).catch( error => this.setState( { error: error } ) )
    }

    render() {
        return (
            <>
                <div className="form-group" onSubmit={this.handleLogin}>
                    <label htmlFor="email">Email address:</label>
                    <input type="email" className="form-control" id="email" />

                    <div className="form-group">
                        <label htmlFor="pwd">Password:</label>
                        <input type="password" className="form-control" id="password" />
                    </div>
                    <button type="submit" className="btn btn-default">Submit</button>
                </div>
            </>
        )
    }
}

export default Login;

if ( document.getElementById( 'login' ) ) {
    ReactDOM.render( <Login />, document.getElementById( 'login' ) );
}
