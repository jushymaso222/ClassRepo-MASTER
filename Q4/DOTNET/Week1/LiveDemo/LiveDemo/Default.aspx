<%@ Page Title="Home Page" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="LiveDemo._Default" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">

    <div style="margin-top: 2rem;">
        <table>
            <tr>
                <td colspan="4">
                    <asp:TextBox ID="textLCD" runat="server" Columns="20" />
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Button ID="btn1" Text="1" runat="server" OnClick="btnNum_Click" />
                    <asp:Button ID="btn2" Text="2" runat="server" OnClick="btnNum_Click" />
                    <asp:Button ID="btn3" Text="3" runat="server" OnClick="btnNum_Click" />
                    <asp:Button ID="btnEquals" Text="=" runat="server" OnClick="btnEquals_Click" />
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Button ID="btn4" Text="4" runat="server" OnClick="btnNum_Click" />
                    <asp:Button ID="btn5" Text="5" runat="server" OnClick="btnNum_Click" />
                    <asp:Button ID="btn6" Text="6" runat="server" OnClick="btnNum_Click" />
                    <asp:Button ID="btnPlus" Text="+" runat="server" OnClick="btnPlus_Click" />
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Button ID="btn7" Text="7" runat="server" OnClick="btnNum_Click" />
                    <asp:Button ID="btn8" Text="8" runat="server" OnClick="btnNum_Click" />
                    <asp:Button ID="btn9" Text="9" runat="server" OnClick="btnNum_Click" />
                    <asp:Button ID="btnMinus" Text="-" runat="server" OnClick="btnMinus_Click" />
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Button ID="btnC" Text="C" runat="server" OnClick="btnClear_Click" />
                    <asp:Button ID="btn0" Text="0" runat="server" OnClick="btnNum_Click" />
                    <asp:Button ID="btnBack" Text="<" runat="server" OnClick="btnBack_Click" />
                </td>
            </tr>
        </table>
    </div>

</asp:Content>
