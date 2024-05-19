import { Component } from "react";

class Blogs extends Component {
    constructor(props) {
        super(props);
        this.state = {
            data: []
        };
    }

    componentDidMount() {
        fetch('https://jsonplaceholder.typicode.com/posts')
        .then(response => response.json())
        .then(data => this.setState({data: data}));
    }


    render() {
        return (
            <div>
                <h1>Blogs</h1>
                <p>This is the blogs page</p>
                <table className="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Body</th>
                        </tr>
                        {this.state.data.map((item, index) => (
                            <tr key={index}>
                                <td>{index + 1}</td>
                                <td>{item.title}</td>
                                <td>{item.body}</td>
                            </tr>
                        ))}
                    </thead>
                </table>
            </div>
        );
    }
}

export default Blogs;