<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="GamePage.aspx.cs" Inherits="Backend_Work.GamePage" %>
<asp:Content ID="Content1" ContentPlaceHolderID="GamesContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <asp:Label ID="lblTitle" runat="server" />
    <br /><br />
    <asp:Image ID="imgIcon" runat="server" CssClass="icon"/>
    <br /><br />
    Developer: <asp:Label ID="lblDev" runat="server" />
    <br /><br />
    Publisher: <asp:Label ID="lblPub" runat="server" />
    <br /><br />
    Release Date:<asp:Label ID="lblDate" runat="server" />
    <br /><br />
    Genre:<asp:Label ID="Label1" runat="server" />
    <br /><br />
    <asp:Label ID="lblDesc" runat="server" />
    <br /><br />
    <asp:Label ID="lblPrice" runat="server" />
    <br /><br />
    <asp:Button ID="btnBuy" runat="server" Text="Buy Now" OnClick="btnBuy_Click"/>
</asp:Content>
