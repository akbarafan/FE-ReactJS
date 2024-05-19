import { Component } from "react";

class Data extends Component{
  constructor(props){
    super(props)

    this.state = {
      data : [
        {nama : "Aldi", nilai : 8},
        {nama : "Joni", nilai : 9},
        {nama : "Budi", nilai : 7},
      ]
    }
  }

  render = () => {
    return(
      <div className="list">
        <h2>Menampilkan Daftar Nilai</h2>

        <ul>
          {this.state.data.map((uts) => 
            <li>{uts.nama} - {uts.nilai}</li>
          )}
        </ul>
      </div>
    )
  }
}

export default Data;