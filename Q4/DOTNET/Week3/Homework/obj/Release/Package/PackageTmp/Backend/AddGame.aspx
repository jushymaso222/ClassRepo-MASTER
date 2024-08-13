<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="AddGame.aspx.cs" Inherits="Backend_Work.Backend.AddGame" %>
<asp:Content ID="Content1" ContentPlaceHolderID="GamesContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <div>
        Game Name: <asp:TextBox ID="txtGName" runat="server" />
        <br />
        <br />
        Image Name: <asp:TextBox ID="txtIMGName" runat="server" />
        <br />
        <br />
        Game Description: <asp:TextBox ID="txtGDesc" runat="server" />
        <br />
        <br />
        Game Price: <asp:TextBox ID="txtGPrice" runat="server" />
        <br />
        <br />
        <asp:Button ID="btnAdd" runat="server" OnClick="btnAdd_Click" Text="Add" />
        <br />
        <br />
        <asp:Button ID="btnBack" runat="server" OnClick="btnBack_Click" Text="Cancel" />
        <br />
        <br />
        <asp:Label ID="lblFeedback" runat="server" Text="" />
    </div>
</asp:Content>
