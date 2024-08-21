<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="AddGame.aspx.cs" Inherits="Backend_Work.Backend.AddGame" %>
<%@ Register Assembly="AjaxControlToolkit" Namespace="AjaxControlToolkit" TagPrefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="GamesContent" runat="server">
    <div>
        <asp:Label ID="lblID" runat="server" />
        <br />
        Game Name: 
        <asp:TextBox ID="txtGName" runat="server" />
        <br />Short Description: 
        <asp:TextBox ID="txtShortDesc" runat="server" />
        <br />Full Description: 
        <asp:TextBox ID="txtGDesc" runat="server" />
        <br />Price: 
        <asp:TextBox ID="txtGPrice" runat="server" />
        <br />Image Name: 
        <asp:TextBox ID="txtIMGName" runat="server" />
        <br />Developer: 
        <asp:TextBox ID="txtDev" runat="server" />
        <br />Publisher: 
        <asp:TextBox ID="txtPub" runat="server" />
        <br />Date Published:  <asp:Calendar ID="calDate" runat="server" />
        <br />
        Genre: 
        <asp:DropDownList ID="selGenre" runat="server">
            <asp:ListItem Enabled="true" Text="Select Genre" Value="-1"></asp:ListItem>
            <asp:ListItem Text="RPG" Value="1"></asp:ListItem>
            <asp:ListItem Text="Adventure" Value="2"></asp:ListItem>
            <asp:ListItem Text="Sports" Value="3"></asp:ListItem>
            <asp:ListItem Text="Racing" Value="4"></asp:ListItem>
            <asp:ListItem Text="Platformer" Value="5"></asp:ListItem>
            <asp:ListItem Text="Survival" Value="6"></asp:ListItem>
            <asp:ListItem Text="Beat Em' Up" Value="7"></asp:ListItem>
            <asp:ListItem Text="Battle Royale" Value="8"></asp:ListItem>
            <asp:ListItem Text="Action" Value="9"></asp:ListItem>
            <asp:ListItem Text="Simulation" Value="10"></asp:ListItem>
            <asp:ListItem Text="Puzzle" Value="11"></asp:ListItem>
            <asp:ListItem Text="Horror" Value="12"></asp:ListItem>
            <asp:ListItem Text="Strategy" Value="13"></asp:ListItem>
            <asp:ListItem Text="FPS" Value="14"></asp:ListItem>
            <asp:ListItem Text="Fighting" Value="15"></asp:ListItem>
            <asp:ListItem Text="Sandbox" Value="16"></asp:ListItem>
            <asp:ListItem Text="MMO" Value="17"></asp:ListItem>
            <asp:ListItem Text="Stealth" Value="18"></asp:ListItem>
        </asp:DropDownList>
        <br />
        <asp:Button ID="btnAdd" runat="server" OnClick="btnAdd_Click" Text="Add" />
        <asp:Button ID="btnUpdate" runat="server" Text="Update Record" OnClick="btnUpdate_Click" />
        <asp:Button ID="btnDelete" runat="server" Text="Delete Record" OnClick="btnDelete_Click" />
        <asp:Button ID="btnBack" runat="server" OnClick="btnBack_Click" Text="Cancel" />
        <br />
        <br />
        <asp:Label ID="lblFeedback" runat="server" Text="" />
    </div>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    </asp:Content>
