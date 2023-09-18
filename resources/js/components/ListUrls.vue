<template>
 <div class="ListUrls">
  
    <span>Sort by:</span>
    <div>
      <button @click="defaultSort" style="margin-right: 10px;" className='vidVibeButton' type="submit">Default Sorting (Recently Added)</button>
      <button @click="MostVisitedSort" className='vidVibeButton' >Most Visited</button>
    </div>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Long Url</th>
      <th scope="col">Short Url</th>
      <th scope="col">Created At</th>
      <th scope="col">Click Count</th>
    </tr>
  </thead>
  <tbody>
      <tr v-for="link in links">
      <td class="longUrl"><a target="_blank" :href="link.url">{{ link.url }}</a></td>
      <td><a target="_blank" :href="`http://127.0.0.1:8000/short/get/${link.id}`">{{`http://127.0.0.1:8000/short/get/${link.id}`}}</a></td>
      <td>{{ new Date(link.created_at).getFullYear()}}/{{new Date(link.created_at).getMonth()+1}}/{{new Date(link.created_at).getDate()}} </td>
      <td>{{ link.statistics_count }}</td>
    </tr>
   
  </tbody>
</table>
 </div>
</template>

<script>
import axios from 'axios';

export default {
  name:"ListUrls",
  data(){
    return {
      links : [],
      defaultSorting : [] ,
      MostVisited : []
    }
  },
 
  methods : {
    defaultSort(){
      this.links = this.links.sort((a, b) => new Date(b.created_at) - new Date(a.created_at))
    },
    MostVisitedSort(){
      this.links = this.links.sort((a, b) => b.statistics_count - a.statistics_count);
    }

  },
  mounted(){
    axios.get('http://127.0.0.1:8000/short/links')
    .then((response)=>{
      this.links = response.data.links
    })
    .catch((err)=>{
      console.log(err)
    })
  }
}
</script>

<style>

.ListUrls{
  height: 91vh;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: start;
  align-items: center;
}

.table {
  width: 90%;
  margin: 0px;
  padding: 0%;
  font-family: 'Poppins', sans-serif;
  border: 2px solid black;
  font-size: 12px;
}

.table th,
.table td {
   text-align: center;
  padding: 8px;
}
.table thead {
  background-color: #0082d8;
  color: #fff;
}

.table tbody tr:nth-child(odd) {
  background-color: #eee;
}


.table tbody td:last-child {
  font-weight: bold;
}
.ListUrls span {
  margin-top: 20px;
  font-family: 'Poppins', sans-serif;
}
.longUrl{
  font-size: 9px;
}
 


</style>