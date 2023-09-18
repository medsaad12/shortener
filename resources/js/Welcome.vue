<template>
  <header className="navbar">
    <span className='logo'>Shortner</span>
  </header>
  <main>
    <UrlForm/>
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
</style>