
<style>

    body{
        background-color: ghostwhite;
    }

    .center{
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .setup-window{
        background-color: white;
        box-shadow: 2px 2px 10px 2px rgba(0, 0, 0, 0.3);
        padding: 32px;
        width: 1000px;
        height: 600px;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .setup-window .column-container{
        display: flex;
        flex-direction: row;
        height: calc(100% - 32px);
    }

    .setup-window .header{
        margin-bottom: 32px;
    }

    .setup-window .header img{
        width: 128px;
    }

    .setup-window .column-container .left{
        width: 30%;
    }

    .setup-window .column-container .right{
        display: flex;
        width: 70%;
        padding: 32px;
    }
    .setup-window .column-container .right *{
        width: 100%;
        color: gray;
    }

    .setup-window .column-container .right h1{
        font-size: xxx-large;
    }


    .setup-window .footer{
        display:  flex;
        flex-direction: row-reverse;
        gap: 8px;
    }

    .setup-window .left ol{
        list-style: none;
        font-size: smaller;
        margin-left: 0!important;
        padding-left: 0!important;
    }

    .setup-window .left ol .active{
        background: rgb(7,42,64);
        background: linear-gradient(90deg, rgba(7,42,64,1) 0%, rgba(0,0,0,0) 85%);
        color: whitesmoke;
    }

    .setup-window .left ol li{
        padding: 4px;
    }

    .button{
        padding: 4px;
        text-decoration: none;
        color: #252525;

    }

    .button:hover{
        color: #252525;
    }

    .button-primary{
        background-color: orange;
    }

    .button-primary:hover
    {
        background-color: #e59800;
    }

    .button-secondary{
        background-color: transparent;
    }

    .button-secondary:hover
    {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .overlay{
        position: absolute;
        top:0;
        left:0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.25);
    }

    .menu-bar{
        display: flex;
        flex-direction: row;
        margin-top: 8px;
        margin-bottom: 8px;
        width: 100%;
    }

</style>


<div class="menu-bar">
    <a class="button button-primary" id="SetupAgentButton" style="margin-left:auto" >Setup Agent</a>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Agent ID</th>
        <th scope="col">Name</th>
        <th scope="col">Status Check</th>
        <th scope="col">IPv4</th>
        <th scope="col">Platform</th>
        <th scope="col">Registration Date</th>

    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
    </tr>
    </tbody>
</table>