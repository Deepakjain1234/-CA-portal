import React, { Component } from 'react'
import Person from './Person'



export default class LeaderBoard extends Component {
    constructor() {
        super();
        this.state = {
            tasks: []
        }
        //
    }
    async componentDidMount() {
        let url = `/api/leaderboard`
        let data = await fetch(url)
        let parsedData = await data.json()
        console.log(parsedData)
        this.setState({ tasks: parsedData})
    }
    render() {
        console.log(this.state.tasks);
        return (
            <>
                <div className="containerN">
                <table className="content-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Points</th>
                            <th>Institute</th>
                        </tr>
                    </thead>
                    <tbody>
                        {this.state.tasks.length == 0 ?"":this.state.tasks.map((element,index)=>{
                            console.log(element.instituteName);
                            console.log(index)
                            return(
                                <Person key={element.sno} element={element} index={index+1} />
                            )
                        })}
                    </tbody>
                </table>
                </div>
            </>
        )
    }
}
