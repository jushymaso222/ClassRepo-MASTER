<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="ManageRecords.aspx.cs" Inherits="Backend_Work.Backend.ManageRecords" %>
<asp:Content ID="Content1" ContentPlaceHolderID="GamesContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <p>
        Game Title: <asp:TextBox ID="txtTitle" runat="server" Columns="30" />

        &nbsp; &nbsp; &nbsp; &nbsp;

        Developer: <asp:TextBox ID="txtDeveloper" runat="server" Columns="30" /> 
    </p>

    <br />

    <asp:Button ID="btnSearch" runat="server" Text="Find Records" OnClick="btnSearch_Click" />

    <br />

    <br />

    <asp:DataGrid ID="dgResults" runat="server" AutoGenerateColumns="false" >
        <Columns>
            <asp:BoundColumn DataField="ID" HeaderText="ID" />
            <asp:BoundColumn DataField="Title" HeaderText="Game Title" />
            <asp:BoundColumn DataField="Developer" HeaderText="Developer" />
            <asp:BoundColumn DataField="Publisher" HeaderText="Publisher" />
            <asp:BoundColumn DataField="Genre" HeaderText="Genre" />

            <asp:HyperLinkColumn Text="Edit" DataNavigateUrlFormatString="~/Backend/AddGame.aspx?ID={0}" DataNavigateUrlField="ID" />
        </Columns>
    </asp:DataGrid>
</asp:Content>
