import { Component } from "react";
import { Link } from "react-router-dom";

class Contact extends Component {
  constructor(props) {
    super(props);
    this.state = {
        data: []
    };
  }

  componentDidMount() {
    fetch('http://127.0.0.1:8000/api/data-guru')
    .then(response => response.json())
    .then(data => this.setState({data: data.data}));
  }

  handleDelete = async (id) => {
    const confirmed = window.confirm('Apakah Anda yakin ingin menghapus data ini?');
    if (confirmed) {
        fetch('http://127.0.0.1:8000/api/delete-guru/'+id, { 
        method: 'DELETE' })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            this.setState(prevState => ({
                data: prevState.data.filter(item => item.id !== id)
            }))
        })
        .catch(error => console.error('Error:', error));
    }
  };

  render() {
    return (
        <div className="container">
            <h1>Contact US</h1>
            <p>Lets Contact Us</p>
            <div className="d-flex justify-content-start mt-3">
                <a class="btn btn-primary" href="tambah">Tambah</a>
            </div>
            <table className="table mt-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Ruangan</th>
                        <th>Aksi</th>
                    </tr>
                    {this.state.data.map((item, index) => (
                        <tr key={index}>
                            <td>{index + 1}</td>
                            <td>{item.name}</td>
                            <td>{item.major}</td>
                            <td>{item.room}</td>
                            <td>
                                <button onClick={() => this.handleDelete(item.id)} class="btn btn-danger">Hapus </button>
                                |
                                <a href={`/tambah/${item.id}`} class="btn btn-secondary">Ubah </a>
                            </td>
                        </tr>
                    ))}
                </thead>
            </table>
        </div>
    );
  }
}

export default Contact;