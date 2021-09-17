import React from 'react'
import PropTypes from 'prop-types'

function Person({element,index}) {
    // console.log(element);
    return (
        <tr>
            <td>{index}</td>
            <td>{element.name}</td>
            <td>{element.points}</td>
            <td>{element.instituteName}</td>
        </tr>
    )
}

export default Person

