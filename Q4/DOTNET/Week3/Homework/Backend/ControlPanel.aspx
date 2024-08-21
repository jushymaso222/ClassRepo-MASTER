<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="ControlPanel.aspx.cs" Inherits="Backend_Work.Backend.ControlPanel" %>

<asp:Content ID="Content1" ContentPlaceHolderID="GamesContent" runat="server">
</asp:Content>

<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <div>
        <h2>Control Panel</h2>

        <table>
            <tr>
                <td><a href="AddGame.aspx" runat="server">Add a Game</a></td>
            </tr>
            <tr>
                <td><a href="ManageRecords.aspx" runat="server">Find Games</a></td>
            </tr>
            <tr>
                <td>
                    <asp:Button ID="btnLogout" runat="server" Text="Logout" OnClick="btnLogout_Click" />
                </td>
            </tr>
        </table>
    </div>
</asp:Content>
