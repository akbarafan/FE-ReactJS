import { Component } from 'react'
import withRouter from './withRouter';

class Tambah extends Component {
  constructor(props) {
    super(props);
    this.state = {
        room: [],
        id: null,
        name: '',
        major: '',
        room_id: '',
    };
  }

  componentDidMount() {
    fetch('http://127.0.0.1:8000/api/room')
      .then(response => response.json())
      .then(data => this.setState({ room: data.data }));

    const { id } = this.props.params;
    if (id) {
      this.fetchDataById(id);
    }
  }

  fetchDataById = async (id) => {
    fetch(`http://127.0.0.1:8000/api/show-guru/${id}`)
      .then(response => response.json())
      .then(data => this.setState({
        id: data.data.id,
        name: data.data.name,
        major: data.data.major,
        room_id: data.data.room_id
      }));
  }

  handleChange = (event) => {
    this.setState({ [event.target.name]: event.target.value });
  };

  handleSubmit = async (event) => {
    event.preventDefault();
    const { id, name, major, room_id } = this.state;

    const url = id ? `http://127.0.0.1:8000/api/update-guru/${id}` : 'http://127.0.0.1:8000/api/send-guru';
    const method = id ? 'PUT' : 'POST';

    fetch(url, {
      method,
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        name,
        major,
        room_id,
      }),
    })
      .then(response => response.json())
      .then(data => {
          alert(data.message);
          this.setState({ name: '', major: '', room_id: '' });
          window.location.href = '/contact';
      })
      .catch(error => console.error('Error:', error));
  };

  render() {
    return (
      <div className='container'>
        <form onSubmit={this.handleSubmit}>
          <table className="table mt-4">
            <tbody>
              <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td>
                  <input type="text" value={this.state.name} onChange={this.handleChange} name="name" className="form-control"
                  />
                </td>
              </tr>
              <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                  <input type="text" value={this.state.major} onChange={this.handleChange} name="major" className="form-control"
                    required
                  />
                </td>
              </tr>
              <tr>
                <td>Ruang</td>
                <td>:</td>
                <td>
                  <select name="room_id" value={this.state.room_id} onChange={this.handleChange} className="form-control"
                    required
                  >
                    <option value="" disabled>Pilih Ruang</option>
                    {this.state.room.map((item) => (
                      <option key={item.id} value={item.id}>
                        {item.name}
                      </option>
                    ))}
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
          <div className="d-flex justify-content-end mt-4">
            <button type="submit" className="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    );
  }
}

export default withRouter(Tambah);