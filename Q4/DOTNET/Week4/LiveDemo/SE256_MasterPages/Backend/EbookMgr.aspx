<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="EbookMgr.aspx.cs" Inherits="SE256_MasterPages.Backend.EbookMgr" %>
<asp:Content ID="Content1" ContentPlaceHolderID="BreakingNewsContent" runat="server">

    <a href="~/Backend/ControlPanel.aspx" runat="server">Return to the Control Panel</a>

</asp:Content>



<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">

    <table>

        <%-- Book ID --%>
        <tr>
            <td>Book ID:</td>
            <td><asp:Label ID="lblBookID" runat="server" /></td>
        </tr>


        <%-- Book Title --%>
        <tr>
            <td>Book Title:</td>
            <td><asp:TextBox ID="txtTitle" runat="server" MaxLength="255"/></td>
        </tr>

        <%-- Book Author INFO --%>
        <tr>
            <td>Author First Name:</td>
            <td><asp:TextBox ID="txtAuthorFirst" runat="server" MaxLength="30"/></td>
        </tr>

        <tr>
            <td>Author Last Name:</td>
            <td><asp:TextBox ID="txtAuthorLast" runat="server" MaxLength="40"/></td>
        </tr>

        <tr>
            <td>Author Email:</td>
            <td><asp:TextBox ID="txtAuthorEmail" runat="server" MaxLength="40"/></td>
        </tr>

        <%-- Date Published --%>
        <tr>
            <td>Date Published:</td>
            <td><asp:Calendar ID="calDatePublished" runat="server"/></td>
        </tr>

        <%-- Pages --%>
        <tr>
            <td>Number of Pages:</td>
            <td><asp:TextBox ID="txtPages" runat="server" MaxLength="5"/></td>
        </tr>

        <%-- Price --%>
        <tr>
            <td>Book Price:</td>
            <td style="display: block; margin-left: -0.5rem;">$<asp:TextBox ID="txtPrice" runat="server" MaxLength="10"/></td>
        </tr>

        <%-- Date Rental Expires--%>
        <tr>
            <td>Date Rental Expires:</td>
            <td><asp:Calendar ID="calDateRental" runat="server"/></td>
        </tr>

        <%-- Bookmark Page--%>
        <tr>
            <td>Bookmark Page:</td>
            <td><asp:TextBox ID="txtBookmarkPage" runat="server" MaxLength="5"/></td>
        </tr>




    </table>



    <br />
    <asp:Button ID="btnAdd" runat="server" Text="Add a Book" OnClick="btnAdd_Click" />
    <asp:Button ID="btnUpdate" runat="server" Text="Add a Book" OnClick="btnUpdate_Click" />
    <asp:Button ID="btnDelete" runat="server" Text="Add a Book" OnClick="btnDelete_Click" />
    <asp:Button ID="btnCancel" runat="server" Text="Add a Book" OnClick="btnCancel_Click" />

    <br />
    <br />

    <asp:Label ID="lblFeedback" runat="server" />


</asp:Content>
