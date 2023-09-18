<template>
  <header className="navbar">
    <router-link style="text-decoration: none;" to="/"><span className='logo'>Shortner</span></router-link> 
    <nav>
      <router-link  to="/list"><button className='vidVibeButton' type="submit">All Shortened URLs </button></router-link>:
    </nav>
  </header>
  <main>
   <router-view></router-view>
  </main>
</template>

<script>
import UrlForm from './components/UrlForm.vue'; 
export default {
  name:"Welcome",
  components: { 
    UrlForm
  }
}
</script>

<style>
 .navbar{
    height: 60px;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 8px;
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.logo{
    color: #0082d8;
    font-family: 'Poppins', sans-serif;
    font-size: 19px;
    cursor: pointer;

}
.logo:hover{
  color: #00558d;
}
.vidVibeButton{
    padding: 10px;
    margin-top: 8px;
    margin-bottom: 8px;
    background: #0082d8; /* Blue button background */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    color: white;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
}

.vidVibeButton:hover {
    background: #2980b9; /* Darker blue on hover */
}
</style>