import React, { Component } from 'react'

export default class Profile extends Component {
    constructor(props) {
        super(props);
        this.state = {
            tasks:JSON.parse(props.user)
        }

    }
    render() {
        return (
            <>
                <div className="containerProf">
                    <div className="Profile">
                        <div className="UserImageSection">
                            <img src="https://res.cloudinary.com/demo/image/upload/d_avatar.png/non_existing_id.png" width="200px" alt="" />
                        </div>
                        <div className="userData">
                            <div className="Name">
                                <span>Name : </span>
                                <span>{this.state.tasks.name}</span>
                            </div>
                            <div className="phoneNo">
                                <span>Contact : </span>
                                <span><a href="tel:+91">{this.state.tasks.mobile ? this.state.tasks.mobile : ""}</a></span>
                            </div>
                            <div className="emails">
                                <span>Email : </span>
                                <span><a href={`mailto:${this.state.tasks.email ? this.state.tasks.email : ""}`}>{this.state.tasks.email ? this.state.tasks.email : ""}</a></span>.
                            </div>
                            <div className="College-Name">
                                <span>Institution Name : </span>
                                <span>{this.state.tasks.instituteName ? this.state.tasks.instituteName : ""}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        )
    }
}
