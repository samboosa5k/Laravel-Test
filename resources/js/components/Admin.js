import React from 'react';
import ReactDOM from 'react-dom';

class Admin extends React.Component {
    constructor( props ) {
        super( props );
        this.state = {
            token: '',
            status: '',
            apiResponse: '',
            error: ''
        }

        this.loadAdmin = this.loadAdmin.bind( this );
    }

    loadAdmin() {
        fetch( 'http://127.0.0.1:8000/management', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + this.props.token.token,
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'
            }
        } )
            .then( response => response.json() )
            .then( data => {
                this.setState( { apiResponse: data } );
            } ).catch( error => this.setState( { error: error } ) )
    }

    componentDidMount() {
        console.log( this.props.token.token );
        this.loadAdmin();
    }

    render() {
        let content = 'Admin loaded...';

        if ( this.state.apiResponse !== '' ) {
            content = <strong>Welcome to the admin area!</strong>
        }

        return (
            <>
                <div className='box'>
                    {content}
                    <br />
                    {this.state.apiResponse.message}
                </div>
            </>
        )
    }
}

export default Admin;

if ( document.getElementById( 'admin' ) ) {
    ReactDOM.render( <Admin />, document.getElementById( 'admin' ) );
}
