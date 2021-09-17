import React, { Component } from 'react'

export default class NewTask extends Component {
    user
    constructor(props) {
        super(props);
        this.user = JSON.parse(this.props.user);
        this.state={
            tasks:[]
        }
    }
    async componentDidMount() {
        let data = await fetch(`/api/submittedTask?user_id=${this.user.user_id}`)
        let parsedData = await data.json();
        this.setState({tasks:parsedData});
    }
    render() {
        return (
            <>

                <div className="containerN">
                    {this.state.tasks.length == 0 ? " ":this.state.tasks.map((element) => {
                        return <div className="cards" style={{height:'300px'}}>
                        <div className="card-head">
                            <span>{element.name}</span>
                        </div>
                        <div className="task-des">
                            <div className="text-des">
                                {element.description}
                            </div>
                        </div>
                        <div className="points-card">
                            <span>Points : </span>
                            <span>{element.points}</span>
                        </div>
                        <div className="dates">
                            <div className="offered-on">
                                <span>Offered On : </span>
                                <span>{Date(element.created_at)}</span>
                            </div>
                            <div className="last-date">
                                <span>Approved : </span>
                                <span>{element.approved == true?"Yes":"No"}</span>
                            </div>
                        </div>
                    </div>
                    })}
                </div>
            </>
        )
    }
}
