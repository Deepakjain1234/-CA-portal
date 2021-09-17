import React, { Component } from 'react'
import $ from 'jquery';
import firebase from 'firebase';
const firebaseConfig = {
    apiKey: "AIzaSyCWaSrzC6XJE6iwcTXE2uZ3pEje8Z5Ij5U",
    authDomain: "react-project-8698c.firebaseapp.com",
    projectId: "react-project-8698c",
    storageBucket: "react-project-8698c.appspot.com",
    messagingSenderId: "281067314635",
    appId: "1:281067314635:web:19080dd05470a7fa8c2a4e",
    measurementId: "G-5QPJ8DT9C9"
};
firebase.initializeApp(firebaseConfig);

export default class NewTask extends Component {
    link = null;
    user;
    constructor(props) {
        super(props);
        this.user = JSON.parse(props.user);
        this.state = {
            tasks: [],
            files: null
        }
    }
    handleChange = (files) => {
        this.setState({
            files: files
        })
    }
    postRequest = (id) => {
        console.log(id)
        let toSend = {
            "taskId": id,
            "userId": this.user.user_id,
            "submittedTaskURL": this.link,
        }
        console.log(toSend)
        $.ajax({
            url: "/api/uploadedTask",
            type: "POST",
            data: toSend,
            success: function (response) {
                alert(response);
                console.log("Success")
            }
        })
    }
    handleSave = async () => {
        let bucket = 'images'
        let file = this.state.files[0]
        let storage = firebase.storage()
        try {
            let storeInFirebase = storage.ref(`${bucket}/${file.name}`)
            let uploadTask = storeInFirebase.put(file)
            uploadTask.on(firebase.storage.TaskEvent.STATE_CHANGED, {
                'next': () => { console.log("next") },
                'error':()=>{ console.log("error")},
                'complete': async () => {
                    await uploadTask.snapshot.ref.getDownloadURL().then(url => this.link = url)
                    alert("Uploaded Successfully")
                }
            })
        } catch (error) {
            console.log(error)
        }
    }
    async componentDidMount() {
        let url = `/api/task`
        let data = await fetch(url)
        let parsedData = await data.json()
        this.setState({ tasks: parsedData })
    }
    async componentDidUpdate() {

    }
    render() {
        console.log(this.user_id);
        return (
            <>
                <div className="taskInfo">
                    <h2>Submit your proof in a single compressed file</h2>
                </div>
                <div className="containerN">
                    {this.state.tasks.map((element) => {
                        console.log(element)
                        return <div className="cards">
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
                                <span>{element.created_at}</span>
                            </div>
                                <div className="last-date">
                                    <span>Last Date : </span>
                                    <span>{element.lastDate}</span>
                                </div>
                            </div>
                            <div id="follow" className="social-box">
                                <a href={element.facebookLink} target="_blank"><i className="fab fa-facebook-square"></i></a>
                                <a href={element.twitterLink} target="_blank"><i className="fab fa-twitter-square"></i></a>
                                <a href={element.instagramLink} target="_blank"><i className="fab fa-instagram"></i></a>
                                <a href={element.linkedinLink} target="_blank"><i className="fab fa-linkedin"></i></a>
                            </div>
                            <div className="proof-task">
                                <div className="text-proof">
                                    <span>Submit your proof here</span>
                                </div>
                                <div className="buttonUpload">
                                    <input type="file" className="btnFile" onChange={(e) => { this.handleChange(e.target.files) }} />
                                    <button className="btn-grad" onClick={()=>{this.handleSave()}}>Upload Here...</button>
                                </div>
                                    <button className="btn-submit" onClick={()=>{this.postRequest(element.id)}}>Submit</button>
                            </div>
                        </div>
                    })}
                </div>
            </>
        )
    }
}
